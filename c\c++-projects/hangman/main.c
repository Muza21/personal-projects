#include <stdio.h>
#include <stdlib.h>


int compareWords(char word1[],char word2[]){
    int numberOfLetters = strlen(word2);
    for(int i=0;i<numberOfLetters;i++){
        if(word1[i]!=word2[i]){
            return 0;
        }
    }
    printf("Words match!");
    return 1;
}


int main()
{
    printf("Hangman!\n");

    char stages[6][90]={
        " ",
        "  _______\n |/      |\n |      (_)\n |\n |\n |\n |\n_|___\n",
        "  _______\n |/      |\n |      (_)\n |      \\|\n |\n |\n |\n_|___\n",
        "  _______\n |/      |\n |      (_)\n |      \\|/\n |\n |\n |\n_|___\n",
        "  _______\n |/      |\n |      (_)\n |      \\|/\n |       |\n |      /\n |\n_|___\n",
        "  _______\n |/      |\n |      (_)\n |      \\|/\n |       |\n |      / \\\n |\n_|___\n",
    };
    char secretWord[50];
    printf("Enter a secret word:\n");
    scanf("%s",secretWord);
    int numberOfLetters = strlen(secretWord);

    char guessedWord[50];
    for(int i=0;i<numberOfLetters;i++){
        guessedWord[i]='_';
    }

    char guessCharacter;
    int chanceOfGuess = 5;
    int guessCounter = 0;

    printf("%s\n",guessedWord);
    while(guessCounter<chanceOfGuess){
        int flag = 0;
        printf("Choose a character to guess a word:\n");
        scanf(" %c", &guessCharacter);
        for(int i=0;i<numberOfLetters;i++){
            if(guessCharacter==secretWord[i]){
                guessedWord[i]=guessCharacter;
                flag = 1;
            }
        }
        printf("%s\n",guessedWord);
        if(flag == 1){
            printf("You guessd correctly!\n");
            if(compareWords(guessedWord,secretWord)){
                break;
            }
        }else{
            guessCounter++;
            printf("Wrong!!! %d chances left",chanceOfGuess-guessCounter);
            printf("%s",stages[guessCounter]);
        }
    }

    if(guessCounter>=chanceOfGuess){
        printf("You lost!\n");
    }else{
        printf("You won!\n");
    }
    return 0;
}
