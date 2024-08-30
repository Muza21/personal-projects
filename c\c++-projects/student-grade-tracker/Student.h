#include <stdio.h>
#include <stdlib.h>
#include <string.h>

// Constants
#define MAX_STUDENTS 100
#define MAX_COURSES 10
#define PASSING_GRADE 51.0
#define DATA_FILE "students.txt"
#define MAX_NAME_LENGTH 100

typedef struct {
    char name[MAX_NAME_LENGTH];
    float grades[MAX_COURSES];
    int num_courses;
    float average;
    char pass_fail[10];
    unsigned int id;
} Student;

// Function Declarations

// populates student data into the student's array from the file
void populate_student_data(Student *student, FILE *file);

// read's student data from the file line by line using populate_student_data function
void read_student_data(Student students[], int *num_students);

// writes data to the file from the student's array
void write_student_data(Student students[], int num_students);

// asks user to iput data of the student and stores it inside student's array
void input_student_data(Student students[], int *num_students);

// calculates average based on student's grades
void calculate_average(Student *student);

// determines whether a student passed or failed based on the average grade
void determine_pass_fail(Student *student);

// generates random id for the student using bitwise operators
void generate_id(Student *student);

// displays all students data that was populated inside students' araray
void display_students_data(Student students[], int num_students);

// displaying menu for user to navigate and do different options
void menu(Student students[], int *num_students);

// search a specific student using student's name or id
void search_students(Student students[], int num_students);

// display a specific student's details
void display_student_details(Student *student);

// remove a specific student from the students' array
void remove_student(Student students[], int *num_students, const char *search_term);

// asking a user for a specific student's infomration, which one to remove and calling remove_student fucntion
void remove_student_menu(Student students[], int *num_students);
