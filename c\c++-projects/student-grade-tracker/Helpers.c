#include "Helpers.h"

void clear_input_buffer() {
    int c;
    while ((c = getchar()) != '\n' && c != EOF);
}

unsigned int mix_bits(unsigned int seed) {
    // use xor operator
    seed ^= seed >> 21; // shift right by 21 bits
    seed ^= seed << 35; // shift left by 35 bits
    seed ^= seed >> 4; // shift right by 4 bits
    return seed * 2685821657736338717ull; // multiply seed by unsigned long long type number
}

int random10(unsigned int seed) { // generate a number between range 1000 - 9999
    int min = 1000;
    int max = 10000;
    int denominator = max - min; // determine range
    unsigned int r = mix_bits(seed); // mix bits and store the value in r variable

    // Perform modulo operation
    int result = min + r % denominator; // generate random number

    return result;
}

int generate_random_number() {
    unsigned int seed = (unsigned int)time(NULL);  // Use current time as seed
    return random10(seed); // call function to generate a random number and return it
}


void printErr(const char *message, ...) { // declare a function named printErr that takes a variable number of arguments
    va_list args;   // Declare a va_list type variable named args
    va_start(args, message);  // Initialize the va_list to point to the first variable argument after 'message'
    printf(ANSI_COLOR_RED);    // Set the color to red
    vprintf(message, args);     // Print the formatted string with variable arguments
    printf(ANSI_COLOR_RESET);  // Reset the color
    va_end(args);              // Clean up the va_list
}
