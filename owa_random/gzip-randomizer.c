#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
/*
gzip-randomizer.c Program to add some random characters as part of a fake filename to change the size of a gzip file.
The altered gzip file will still be compatible with zlib and gunzip for uncompressing, because the filename provided is typically ignored.
Rafael Palacios Jun/2021
*/

int main(int argc, char **argv)
{
	FILE *in;
	FILE *out;
	int ch;
	int i,num,len;
	char outname[1000];
	//time_t t;

	/* check arguments */
	if (argc!=3) {
		printf("The correct syntax is:  %s filename.gz length\n",argv[0]);
		printf("Min length is 0, max length is 100.\n");
		printf("A minimum of 1 character is added.\n");
		printf("Example: %s myfile.gz 20\n",argv[0]);
		printf("    up to 20 additional characters.\n");
		exit(-1);
	}

	/* Intializes random number generator */
	unsigned int seed;
	FILE* urandom = fopen("/dev/random", "r");
	fread(&seed, sizeof(int), 1, urandom);
	fclose(urandom);
	srand(seed);
	//srand((unsigned)time(0));  //This was crap random initialization, just for testing

	len=atoi(argv[2]);
	if (len>100) len=100;
	if (len<=0) num=0;
	else num=rand()%len; //length of name to be added.


	/* Open files */
	strncpy(outname,argv[1],998); outname[998]='\0';
	strcat(outname,"2");
	in=fopen(argv[1],"rb");
	out=fopen(outname,"wb");
	if (in==NULL || out==NULL) {
		printf("ERROR openning files: %s or %s\n",argv[1],outname);
		exit(-1);
	}

	ch=fgetc(in);
	if (ch!=0x1f) {
		printf("ERROR unexpected first character not 1F\n");
		exit(-1);
	}
	fputc(ch,out);

	ch=fgetc(in);
	if (ch!=0x8b) {
		printf("ERROR unexpected second character not 8B\n");
		exit(-1);
	}
	fputc(ch,out);

	ch=fgetc(in);
	if (ch!=0x08) {
		printf("ERROR unexpected third character not 08\n");
		exit(-1);
	}
	fputc(ch,out);

	//READ 4th character. This is the flag to indicate if there is FNAME or not
	ch=fgetc(in);
	if (ch==0x00) {
		//Flag is 00. This means there is no filename. We need to create it
		ch=0x08; //Flag for FNAME
		fputc(ch,out);
		for(i=0; i<6; i++) { // read and write next 6 characters
			ch=fgetc(in);
			fputc(ch,out);
		}
		//Lets write some letters 'a' as FNAME
		for(i=0; i<num; i++) fputc('a',out);
		fputc('\0',out); //a minimum of one character is added.
	} else if (ch | 0x08) {  //bit OR to check for FNAME flag
		//OK we have FNAME flag on
		fputc(ch,out);
		for(i=0; i<6; i++) { // read and write next 6 characters
			ch=fgetc(in);
			fputc(ch,out);
		}
		//Lets write some letters 'a' in fron of the current FNAME
		for(i=0; i<num+1; i++) fputc('a',out); //a minimum of one character is added.
	} else {
		printf("Something unexpected with the flag: %x",ch);
		exit(-1);
	}

	while ((ch=fgetc(in)) !=EOF) 	fputc(ch,out);

	fclose(in);
	fclose(out);
	return 0;
}
