# PAPER-Heal-the-Breach

This repository contains all the software mentioned in the paper:

### HTB: A Very Effective Method to Protect Web Servers Against BREACH Attack to HTTPS

#### Rafael Palacios, Andrea Fariña, Eugenio F. Sánchez-Úbeda, Pablo García-de-Zúñiga

#### Pontifical Comillas University, ICAI School of Engineering, Institute for Research in Technology, Madrid, Spain



**gzip-randomizer.c**
Program to modify a .gz file previously created with gzip to randomly change its length

**owa**
This is software to be installed in a webserver (php is requiered) to simulate the behaviour of and old Outlook Web Access (OWA) webmail interface

**owa_random**
This is software to be installed in a webserver. This is the same as owa folder but implementing HTB protection
gzip-randomizer may need to be recompiled (the binary provided is for Linux/Intel) using command:
gcc -o gzip-randomizer gzip-randomizer.c
