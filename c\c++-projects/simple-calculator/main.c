#include <stdio.h>
#include <stdlib.h>

int main()
{
    char op;
    double input1,input2;
    printf("\t\tSimple Calculator!\n");
    while(1){

        printf("Enter operation +, -, /, and *\nTo exit press x\n->");
        scanf(" %c",&op);
        if(op=='x'){
            exit(0);
        }
        printf("Enter numbers:\n");
        scanf("%lf %lf",&input1,&input2);
        switch(op){
            case '+': printf("%f\n",input1+input2);
                    break;
            case '-': printf("%f\n",input1-input2);
                    break;
            case '/': printf("%f\n",input1/input2);
                    break;
            case '*': printf("%f\n",input1*input2);
                    break;
            default: printf("Wrong opperation, choose again!\n");
                    break;
        }
    }
    //char operation;
    //double input;
    //scanf

    return 0;
}
