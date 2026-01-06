# PAPER-Heal-the-Breach

This repository contains all the software mentioned in the paper:

### HTB: A Very Effective Method to Protect Web Servers Against BREACH Attack to HTTPS
#### Rafael Palacios, Andrea Fariña, Eugenio F. Sánchez-Úbeda, Pablo García-de-Zúñiga
#### Pontifical Comillas University, ICAI School of Engineering, Institute for Research in Technology, Madrid, Spain

<br>

**gzip-randomizer.c**<br>
Program to modify a .gz file previously created with gzip to randomly change its length

**owa**<br>
This is software to be installed in a webserver (php is requiered) to simulate the behaviour of and old Outlook Web Access (OWA) webmail interface

**owa_random**<br>
This is software to be installed in a webserver. This is the same as owa folder but implementing HTB protection<br>
gzip-randomizer may need to be recompiled (the binary provided is for Linux/Intel) using command:<br>
`gcc -o gzip-randomizer gzip-randomizer.c`

**BREACH_TOTAL_Original.py**<br>
This a python implementation of a BREACH attack.<br>
This program was created to test the HTB mitigation. Running agaist unprotected owa it can retrieve the secret token, but running against owa_random it's impossible.
