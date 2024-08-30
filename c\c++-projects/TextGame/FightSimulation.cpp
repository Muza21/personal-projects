#include <iostream>
#include <ctime>
#include <random>
#include <windows.h>

using namespace std;

class Fighter{
    float attack;
    float health;
    float damage;
    float currentHealth;
    string name;
    char turn;

    float attackResult;

    int startFighter; // this will be used as basis number of fighters
    int numFighter; // this number will get modified during the game and it shows how many fighters are left
public:
    Fighter();
    Fighter(string,float,float,float,int);

    // Data member Getters
    float getAttack()const{return attack;};
    float getHealth()const{return health;};
    float getDamage()const{return damage;};
    float getCurrentHealt()const{return currentHealth;};
    string getName()const{return name;};
    char getTurn()const{return turn;};
    int getStartFighter()const{return startFighter;};
    int getNumFighter()const{return numFighter;};

    // Data member Setters
    void setAttack(float attack){this->attack=attack;};
    void setHealth(float health){this->health=health;};
    void setDamage(float damage){this->damage=damage;};
    void setCurrentHealt(float currentHealth){this->currentHealth=currentHealth;};
    void setName(string name){this->name=name;};
    void setTurn(char turn){this->turn=turn;};
    int setStartFighter(int numFighter){this->startFighter=startFighter;};
    void setNumFighter(int numFighter){this->numFighter=numFighter;};

    // Other Functions
    void printData();
};
void playGame();
void menuDisplay();
void colorCombinations();
void errorOut();
void cinClean();

void displayCredit();
void options();
int main()
{
    int choice;
    bool flag=true;
    while(flag){
        menuDisplay();
        cin>>choice;
        switch (choice){
        case 1:
            playGame();
            break;
        case 2:
            options();
            break;
        case 3:
            displayCredit();
            break;
        case 4:
            flag=false;
            cout<<"\n\t\t\t **************************"<<endl;
            cout<<"\t\t\t * Thanks, For your time! *"<<endl;
            cout<<"\t\t\t **************************"<<endl;
            break;
        default:
            errorOut();
            continue;
        }
    cinClean();
    }

    return 0;
}

void menuDisplay(){
    //system("color 1f");
    HANDLE hStdOut = GetStdHandle(STD_OUTPUT_HANDLE);
    SetConsoleTextAttribute(hStdOut, 12);
    cout<<endl;
    cout<<"\t\t                 _  _                            "<<endl;
    cout<<"\t\t _  ___  _  ___ | || | ___  ____    _   _   ___  "<<endl;
    cout<<"\t\t| |/ / |/ // _ || || || __|| __ |  / | / | / _ | "<<endl;
    cout<<"\t\t| | /| | /| ___/| || |||__ ||__|| //||//|||  __/ "<<endl;
    cout<<"\t\t|__/ |__/ |___| |_||_||___||____|// ||/ |||___|"<<endl<<endl<<endl;
    //SetConsoleTextAttribute(hStdOut, FOREGROUND_RED | BACKGROUND_BLUE | BACKGROUND_GREEN | BACKGROUND_RED);
    SetConsoleTextAttribute(hStdOut, 10);
    cout<<"\t\t\t   [ ";SetConsoleTextAttribute(hStdOut, 12);cout<<"1";SetConsoleTextAttribute(hStdOut, 10);cout<<" ] ";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"START GAME"<<endl;
    SetConsoleTextAttribute(hStdOut, 10);
    cout<<"\t\t\t   [ ";SetConsoleTextAttribute(hStdOut, 12);cout<<"2";SetConsoleTextAttribute(hStdOut, 10);cout<<" ] ";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"OPTIONS"<<endl;
    SetConsoleTextAttribute(hStdOut, 10);
    cout<<"\t\t\t   [ ";SetConsoleTextAttribute(hStdOut, 12);cout<<"3";SetConsoleTextAttribute(hStdOut, 10);cout<<" ] ";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"CREDITS"<<endl;
    SetConsoleTextAttribute(hStdOut, 10);
    cout<<"\t\t\t   [ ";SetConsoleTextAttribute(hStdOut, 12);cout<<"4";SetConsoleTextAttribute(hStdOut, 10);cout<<" ] ";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"EXIT"<<endl;
    cout<<"\t\t\t Choose "; SetConsoleTextAttribute(hStdOut, 12);cout<<"-> ";SetConsoleTextAttribute(hStdOut, 14);

}
void colorCombinations(){
    for(int i=0;i<256;++i){
        SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),i);
        printf("Text Color in use = %d\n",i);
    }
}

void playGame(){
    // Don't forget to seed your random engine with time!
    default_random_engine randomEngine(time(NULL));
    uniform_real_distribution<float> attack(0.0f, 1.0f);

    // Human properties
    Fighter Human;

    //skeleton properties
    Fighter Skeleton("Skeleton",0.4f,50.0f,40.0f,0);


    float attackResult;

    char turn = 'H';
    system("CLS");
    cout << "*** Skeletons Vs Humans! ***\n\n";

    //Get the number of humans
    cout << "Enter the number of humans: ";
    int numHumans;
    cin >> numHumans;

    Human.setNumFighter(numHumans);

    //Get the number of skeletons
    cout << "Enter the number of skeletons: ";
    int numSkeletons;
    cin >> numSkeletons;

    Skeleton.setNumFighter(numSkeletons);

    cout << "\nBeginning combat!\n\n";

    while ((numHumans > 0) && (numSkeletons > 0)) {
        //Get our attack result
        attackResult = attack(randomEngine);

        // Humans turn
        if (turn == Human.getTurn()) {

            //Check if attack was successful
            if (attackResult <= Human.getAttack()) {
                Skeleton.setCurrentHealt(Skeleton.getCurrentHealt()-Human.getDamage());

                if (Skeleton.getCurrentHealt() < 0) {
                    numSkeletons--;
                    Skeleton.setCurrentHealt(Skeleton.getHealth());
                }
            }
            //now its skellys turn!
            turn = Skeleton.getTurn();

        } else { // if its not humans turn, then we know its skellys turn!

            if (attackResult <= Skeleton.getAttack()) {
                Human.setCurrentHealt(Human.getCurrentHealt()-Skeleton.getDamage());

                if (Human.getCurrentHealt() < 0) {
                    numHumans--;
                    Human.setCurrentHealt(Human.getHealth());
                }
            }
            //now its humans turn!
            turn = Human.getTurn();

        }

    }

    cout << "\nBattle is over!\n\n";

    //print out the results!
    if (numHumans > 0) {
        cout << "Humans won!\n";
        cout << "There are " << numHumans << " humans left!\n";
    } else {
        cout << "Skeletons won!\n";
        cout << "There are " << numSkeletons << " skeletons left!\n";
    }

    //KILL COUNTER!
    //cout << startHumans - numHumans << " humans and " << startSkeletons - numSkeletons << " skeletons lost their lives.\n\n";
}

void errorOut(){
    cout<<"\n\t\t\t ***************************"<<endl;
    cout<<"\t\t\t * Wrong Input! Try Again! *"<<endl;
    cout<<"\t\t\t ***************************\n"<<endl;
    // for wrong input we clear and ignore additional input
    cinClean();
}
void cinClean(){
    cin.clear();
    cin.ignore(10000,'\n');
    system("PAUSE");
    system("CLS");
}

Fighter::Fighter(){
    // Standard Fighter Human
    name = "HUMAN";
    turn = name[0];
    attack = 0.6f;
    health = 250.0f;
    damage = 200.0f;
    currentHealth = health;
    startFighter = 100;
    numFighter = startFighter;
}
Fighter::Fighter(string name,float attack,float health,float damage,int startFighter){
    this->name =name;
    turn = name[0];
    this->attack=attack;
    this->health=health;
    this->damage=damage;
    currentHealth = health;
    this->startFighter = startFighter;
    numFighter = startFighter;
}
void Fighter::printData(){
    HANDLE hStdOut = GetStdHandle(STD_OUTPUT_HANDLE);
    SetConsoleTextAttribute(hStdOut, 14);cout<<"\t\t*****************************"<<endl;
    SetConsoleTextAttribute(hStdOut, 14);cout<<"\t\t**";
    SetConsoleTextAttribute(hStdOut, 12);cout<<" ->>";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"  Fighter Data   ";
    SetConsoleTextAttribute(hStdOut, 12);cout<<"<<- ";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"**"<<endl;
    cout<<"\t\t*****************************"<<endl;
    cout<<"\t\t*";SetConsoleTextAttribute(hStdOut, 12);cout<<"->";
    SetConsoleTextAttribute(hStdOut, 14);cout<<" Name:\t"<< getName() <<endl;
    cout<<"\t\t*";SetConsoleTextAttribute(hStdOut, 12);cout<<"->";
    SetConsoleTextAttribute(hStdOut, 14);cout<<" Health:\t"<< getHealth() <<endl;
    cout<<"\t\t*";SetConsoleTextAttribute(hStdOut, 12);cout<<"->";
    SetConsoleTextAttribute(hStdOut, 14);cout<<" Damage:\t"<< getDamage() <<endl;
    cout<<"\t\t*";SetConsoleTextAttribute(hStdOut, 12);cout<<"->";
    SetConsoleTextAttribute(hStdOut, 14);cout<<" Attack:\t"<< getAttack() <<endl;
    cout<<"\t\t*";SetConsoleTextAttribute(hStdOut, 12);cout<<"->";
    SetConsoleTextAttribute(hStdOut, 14);cout<<" Amount:\t"<< numFighter <<endl;
    cout<<"\t\t*****************************"<<endl;
}
void displayCredit(){
    system("CLS");
    HANDLE hStdOut = GetStdHandle(STD_OUTPUT_HANDLE);
    SetConsoleTextAttribute(hStdOut, 14);
    cout<<"\n\n\n";
    cout<<"\t\t************************************************"<<endl;
    cout<<"\t\t**";
    SetConsoleTextAttribute(hStdOut, 12);cout<<"    This game was created by MuzaCore21     ";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"**"<<endl;
    cout<<"\t\t************************************************"<<endl;
    cout<<"\n\n";
    SetConsoleTextAttribute(hStdOut, 12);cout<<"\t\t-->>";
    SetConsoleTextAttribute(hStdOut, 14);cout<<"   Press Any Key To Go Back to Main Menu    ";
    SetConsoleTextAttribute(hStdOut, 12);cout<<"<<--"<<"\n\n\n\n\n";
    SetConsoleTextAttribute(hStdOut, 14);
}
void options(){

}
