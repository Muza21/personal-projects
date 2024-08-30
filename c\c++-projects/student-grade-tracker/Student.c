#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include "Student.h"
#include "Helpers.h"

// if program is run on windows than include the corresponding library conio.h and use cls to clear console
#ifdef _WIN32
    #include <conio.h>
    #define CLEAR_SCREEN "cls"
#else // otherwise use clear to clear screen
    #include <unistd.h>
    #include <termios.h>
    #define CLEAR_SCREEN "clear"
#endif


void populate_student_data(Student *student, FILE *file) { // read a student data from the file
    // Read each student's data from the file
    fscanf(file, "%[^;];%d;", student->name, &student->num_courses); // "%[^;];%d;" means to read data until ; is met and then read number

    // for num courses read the grades values
    for (int j = 0; j < student->num_courses; j++) {
        fscanf(file, "%f;", &student->grades[j]);
    }

    // read float number that is average again read data until ; is met and read unsigned variable, the separator is ;
    fscanf(file, "%f;%[^;];%u\n", &student->average, student->pass_fail, &student->id);
}

void read_student_data(Student students[], int *num_students) {
    FILE *file = fopen(DATA_FILE, "r"); // open file in read mode
    if (!file) { // check if file exists or not
        printf("Error opening file for reading.\n"); // if there is a problem in opening the file than return
        return;
    }

    // Read the number of students
    fscanf(file, "%d\n", num_students);

    for (int i = 0; i < *num_students; i++) {
        populate_student_data(&students[i], file); // populate all student data using for loop
    }

    fclose(file);
}

void write_student_data(Student students[], int num_students) {
    FILE *file = fopen(DATA_FILE, "w");
    if (!file) {
        printf("Error opening file for writing.\n");
        return;
    }

    fprintf(file, "%d\n", num_students); // on first line store number of students
    for (int i = 0; i < num_students; i++) { // for each student store them inside a file with fields separated by ;
        Student *student = &students[i];
        fprintf(file, "%s;", student->name);
        fprintf(file, "%d;", student->num_courses);
        for (int j = 0; j < student->num_courses; j++) {
            fprintf(file, "%.2f;", student->grades[j]);
        }
        fprintf(file, "%.2f;", student->average);
        fprintf(file, "%s;", student->pass_fail);
        fprintf(file, "%u\n", student->id);
    }

    fclose(file);
}

void input_student_data(Student students[], int *num_students) {
    clear_input_buffer(); // first clear if there is any input buffer
    // check if the students number is more then allowed max students number
    if (*num_students >= MAX_STUDENTS) {
        printErr("Maximum number of students reached.\n");
        return;
    }

    Student *student = &students[*num_students]; // assign the address location of the newly student that needs to be added

    // ask user for the student name, and removing the endline
    printf("Enter student name: ");
    fgets(student->name, MAX_NAME_LENGTH, stdin);
    student->name[strcspn(student->name, "\n")] = '\0';

    // ask the number of courses and check the validation, after that clear input buffer.
    printf("Enter number of courses: ");
    if (scanf("%d", &student->num_courses) != 1 || student->num_courses < 1 || student->num_courses > MAX_COURSES) {
        printErr("Invalid number of courses. Please enter a number between 1 and %d.\n", MAX_COURSES);
        clear_input_buffer();  // Clear the input buffer
        return;
    }
    clear_input_buffer();

    // for number of courses ask user to provide grade, and for each grade check validation and clear input buffer
    for (int i = 0; i < student->num_courses; i++) {
        printf("Enter grade for course %d: ", i + 1);
        float grade;
        if (scanf("%f", &grade) != 1 || grade < 0 || grade > 100) {
            printErr("Invalid grade. Please enter a number between 0 and 100.\n");
            clear_input_buffer();  // Clear any remaining input
            return;
        }
        clear_input_buffer();  // Clear any remaining newline character in input buffer
        student->grades[i] = grade;
    }

    calculate_average(student); // after all grades are written, calculate average and store it
    determine_pass_fail(student); // based on grade determines if student failed or passed
    generate_id(student); // generate random id for student a unique identifier

    (*num_students)++; // increase the number of students after successfully adding the student data
}

void calculate_average(Student *student) { // calculating average based on number of courses and grades of each course
    float sum = 0.0;
    for (int i = 0; i < student->num_courses; i++) {
        sum += student->grades[i];
    }
    student->average = sum / student->num_courses;
}

void determine_pass_fail(Student *student) { // if student's average is more or equal to passing grade in this case 51 than the student passed otherwise failed
    if (student->average >= PASSING_GRADE) {
        strcpy(student->pass_fail, "Pass");
    } else {
        strcpy(student->pass_fail, "Fail");
    }
}

void generate_id(Student *student) {
    student->id = generate_random_number(); // call generate random number function to get random id, it calles helper functions.
}

// display all of the students data in console using for loop
void display_students_data(Student students[], int num_students) {
    for (int i = 0; i < num_students; i++) {
        Student *student = &students[i];
        printf("Student Name: %s\n", student->name);
        printf("Grades: ");
        for (int j = 0; j < student->num_courses; j++) {
            printf("%.2f ", student->grades[j]);
        }
        printf("\nAverage: %.2f\n", student->average);
        printf("Pass/Fail: %s\n", student->pass_fail);
        printf("id: %u\n", student->id);
        printf("\n");
    }
}

// displays meny that has 5 options, add new student, display students data, search and remove student, and exit
void menu(Student students[], int *num_students) {
    int choice = 0;
    char options[][30] = {"Add New Student", "Display Students Data", "Search Student", "Remove Student", "Exit"};
    int num_options = sizeof(options) / sizeof(options[0]);

    // using while loop and for each itteration clearing the screen we display the menu and ask a user for a choice
    while (1) {
        system(CLEAR_SCREEN);

        printf("Menu:\n");
        for (int i = 0; i < num_options; i++) {
            printf("%d. %s\n", i + 1, options[i]);
        }

        printf("Enter your choice (1-%d): ", num_options);
        scanf("%d", &choice);

        // check for choice validation
        if (choice < 1 || choice > num_options) {
            printErr("Error: Invalid choice. Please enter a number between 1 and %d.\n", num_options);
            printf("Press any key to continue...");
            clear_input_buffer(); // Clear input buffer
            getchar(); // Wait for user to acknowledge error message
            continue;
        }

        // for each choice there is a corresponding action
        switch (choice) {
            case 1:
                input_student_data(students, num_students);
                printf("Student added. Press any key to return to menu...");
                break;
            case 2:
                if (*num_students > 0) {
                    display_students_data(students, *num_students);
                } else {
                    printf("No students to display.\n");
                }
                printf("Press any key to return to menu...");
                getchar();
                break;
            case 3:
                // Search functionality
                search_students(students, *num_students);
                printf("Press any key to return to menu...");
                getchar();
                break;
            case 4:
                remove_student_menu(students, num_students);
                printf("Press any key to return to menu...");
                getchar();
                break;
            case 5:
                return;
            default:
                printErr("Invalid choice. Please try again.\n");
                getchar();
                break;
        }
        clear_input_buffer(); // Clear input buffer before next loop iteration
    }
}

// search student by name or id
// we ask a user for an input, and with the provided input we search if it matches a user name or id, if it does it will remove the first occurance of that student
void search_students(Student students[], int num_students) {
    char search_term[100];
    int found = 0;

    printf("Enter student name or ID to search: ");
    scanf(" %[^\n]", search_term); // Read entire line including spaces

    // Search by name or ID
    for (int i = 0; i < num_students; i++) {
        if (strcmp(students[i].name, search_term) == 0 || students[i].id == atoi(search_term)) {
            display_student_details(&students[i]); // if the student name or id matches than call the function to display that specific student's data
            found = 1;
        }
    }

    // if there is nothing found then display that no students are found.
    if (!found) {
        printf("No matching student found.\n");
    }
}

// print the data of the student
void display_student_details(Student *student) {
    printf("\nStudent Name: %s\n", student->name);
    printf("Grades: ");
    for (int j = 0; j < student->num_courses; j++) {
        printf("%.2f ", student->grades[j]);
    }
    printf("\nAverage: %.2f\n", student->average);
    printf("Pass/Fail: %s\n", student->pass_fail);
    printf("ID: %u\n\n", student->id);
}

// asks the user to enter a student's name or id and removes the first occruence of that student
void remove_student(Student students[], int *num_students, const char *search_term) {
    int found = 0;

    // Search by name or ID
    for (int i = 0; i < *num_students; i++) {
        if (strcmp(students[i].name, search_term) == 0 || students[i].id == atoi(search_term)) {
            // Store details of the student to be removed
            char removed_name[50];
            unsigned int removed_id = students[i].id;

            strcpy(removed_name, students[i].name);

            // Shift remaining elements to the left to overwrite the removed student
            for (int j = i; j < *num_students - 1; j++) {
                students[j] = students[j + 1];
            }
            (*num_students)--;
            found = 1;

            printf("Student '%s' (ID: %u) removed.\n", removed_name, removed_id);
            break; // Exit loop after first match found and removed
        }
    }

    if (!found) {
        printf("No matching student found.\n");
    }
}

// asking a user to enter a student's information in order to search and remove it.
void remove_student_menu(Student students[], int *num_students) {
    char search_term[100];

    printf("Enter student name or ID to remove: ");
    scanf(" %[^\n]", search_term); // Read entire line including spaces

    remove_student(students, num_students, search_term);
}
