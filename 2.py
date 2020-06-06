from math import floor, ceil

def cetak_gambar(input):
    print ("--- Panjang ---")
    for i in range(input):
        for j in range(input):
            if i == floor(input/2): #print * in mid of the range input
                print ("* ",end = '')
            elif 0<j<input-1: #print = after first array and before last array
                print ("= ",end = '')
            else: #print * in first and last array
                print ("* ",end = '')
        print("")

#inputuser = int(input("Input Odd number : ")) #If want to get input from user
inputuser = 5 #static input
cetak_gambar(inputuser)