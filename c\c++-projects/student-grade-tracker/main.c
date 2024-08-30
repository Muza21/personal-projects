#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include "Student.h"

int main() {
    Student students[MAX_STUDENTS];
    int num_students = 0;

    // Read data from file
    read_student_data(students, &num_students);

    // Menu loop
    menu(students, &num_students);

    // Write data to file before exit
    write_student_data(students, num_students);

    return 0;
}
