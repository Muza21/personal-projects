#!/bin/bash

length=12
use_upper="n"
use_lower="n"
use_numbers="n"
use_special="n"
num_passwords=1

secure_random() {
    local range=$1
    local num_bytes=$(( (range + 255) / 256 ))
    local random_num

    if [[ -e /dev/urandom ]]; then
        random_num=$(od -An -N$num_bytes -i /dev/urandom | tr -d ' ')
    else
        random_num=$RANDOM
        while [ $num_bytes -gt 0 ]; do
            random_num+=$RANDOM
            let num_bytes--
        done
    fi

    echo $(( random_num % range ))
}

usage() {
    echo "Usage: $0 [-l length] [-p number] [-u] [-L] [-n] [-s]"
    echo ""
    echo "  -l length     Specify the length of the password (default: 12)"
    echo "  -p number     Specify the number of the passwords (default: 1)"
    echo "  -u            Include uppercase letters"
    echo "  -L            Include lowercase letters"
    echo "  -n            Include numbers"
    echo "  -s            Include special characters"
    echo "  -h            display this help and exit"
    exit 1
}

generate_password() {
    local password=""
    for (( i=0; i<$length; i++ )); do
        local index=$(secure_random ${#char_pool})
        password+="${char_pool:$index:1}"
    done
    echo "$password"
}

main() {
    while getopts "hl:uLnsp:" opt; do
        case $opt in
            h)
                usage
                ;;
            l)
                length=$OPTARG
                ;;
            p)
                num_passwords=$OPTARG
                ;;
            u)
                use_upper="y"
                ;;
            L)
                use_lower="y"
                ;;
            n)
                use_numbers="y"
                ;;
            s)
                use_special="y"
                ;;
            *)
                usage
                ;;
        esac
    done

    validate_input_and_build_char_pool

    trap 'cleanup' EXIT

    for (( i=0; i<$num_passwords; i++ )); do
        password=$(generate_password)
        echo "$password"
    done
}

validate_input_and_build_char_pool() {
    if ! [[ "$num_passwords" =~ ^[0-9]+$ ]] || [ "$num_passwords" -le 0 ]; then
        echo "Error: Number of passwords must be a positive integer."
        usage
    fi

    if ! [[ "$length" =~ ^[0-9]+$ ]] || [ "$length" -le 0 ]; then
        echo "Error: Password length must be a positive integer."
        usage
    fi

    if [ "$use_upper" == "n" ] && [ "$use_lower" == "n" ] && [ "$use_numbers" == "n" ] && [ "$use_special" == "n" ]; then
        use_upper="y"
        use_lower="y"
        use_numbers="y"
        use_special="y"
    fi

    upper="ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    lower="abcdefghijklmnopqrstuvwxyz"
    numbers="0123456789"
    special="!@#$%^&*()-_=+[]{}|;:,.<>/?"

    char_pool=""
    [[ "$use_upper" == "y" ]] && char_pool+=$upper
    [[ "$use_lower" == "y" ]] && char_pool+=$lower
    [[ "$use_numbers" == "y" ]] && char_pool+=$numbers
    [[ "$use_special" == "y" ]] && char_pool+=$special

    if [ -z "$char_pool" ]; then
        echo "Error: You must select at least one character set for the password."
        usage
    fi
}

cleanup() {
    unset password char_pool upper lower numbers special
}

main "$@"
