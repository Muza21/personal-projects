#include <stdio.h>
#include <stdarg.h>

// Example ANSI escape codes for colors
#define ANSI_COLOR_RED     "\x1b[31m"
#define ANSI_COLOR_RESET   "\x1b[0m"

void clear_input_buffer(); // clear remaining input (e.g new lines)
unsigned int mix_bits(unsigned int seed); // mix bits using bitwise operations, by shiftig right and left
int random10(unsigned int seed); // determine range and generate random number
int generate_random_numbers(); // call random generator functoin and return the generated random number
void printErr(const char *message, ...); // print error message in fomrated text
