#include <stdio.h>
#include <stdlib.h>

int determineWinner(char user, char computer);
char generateComputerChoice();

int main()
{
    char computer = generateComputerChoice();
    char user;
    printf("Enter user input choose rock (r), paper (p), or scissors (s)\n");
    scanf("%c",&user);
    int result = determineWinner(user,computer);
    if(result ==-1){
        printf("draw");
    }else if(result == 1){
        printf("computer wins");
    }else if(result == 0){
        printf("user wins");
    }else{
        printf("Error %d",result);
    }
    return 0;
}

int determineWinner(char user, char computer){
    int ERROR_EXCEPTION = 10;

    if(user == computer){
        return -1;
    }else if(user == 'r'){
        if(computer == 'p'){
            return 1;
        }else if(computer == 's'){
            return 0;
        }
    }else if(user == 'p'){
        if(computer == 's'){
            return 1;
        }else if(computer == 'r'){
            return 0;
        }
    }else if(user == 's'){
        if(computer == 'r'){
            return 1;
        }else if(computer == 'p'){
            return 0;
        }
    }
    return ERROR_EXCEPTION;
}

char generateComputerChoice(){
    char ERROR_EXCEPTION = 'R';

    srand(time(NULL));
    int n = rand()%100;
    if(n<33){
        return 'r';
    }else if(n>=33&&n<=66){
        return 'p';
    }else{
        return 's';
    }
    return ERROR_EXCEPTION;
}
