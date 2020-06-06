def divideAndSort(input):
    divide = str(input).split('0') #split characters if found 0 and the output is list
    output = ""
    for i in divide:
        list_integer = list(map(int, str(i))) #change number to list
        sorting = sorted(list_integer)  #sort list of number ascending
        number = ''.join(map(str,sorting)) #combine number lists
        output=output+number #combining a list of divide variabel that have been sorted
    return int(output) #return value of method with integer output variabel 

#inputuser = input("Input the number : ") #If want to get input from user
inputuser = 5956560159466056  #static input
print(divideAndSort(inputuser))#print value method divideAndSort