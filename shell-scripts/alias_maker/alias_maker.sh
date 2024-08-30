#!/bin/bash

# Default values
script_dir=$(pwd)
file_extension=".sh"
specific_file=""

# Function to print usage
usage() {
    echo "Usage: $0 [-p <path_to_scripts>] [-e <file_extension>] [-f <specific_file>] [-r <alias>] [-d]"
    echo "  -p  Specify the path to the scripts directory. Default is the current directory."
    echo "  -e  Specify the script file extension. Default is '.sh'."
    echo "  -f  Specify a specific script file to create an alias for."
    echo "  -r  Remove an alias."
    echo "  -d  Display all aliases."
    exit 1
}

# Parse options
while getopts ":p:e:f:r:d" opt; do
  case ${opt} in
    p )
      script_dir=$OPTARG
      ;;
    e )
      file_extension=$OPTARG
      ;;
    f )
      specific_file=$OPTARG
      ;;
    r )
      alias_to_remove=$OPTARG
      ;;
    d )
      display_aliases="y"
      ;;
    \? )
      echo "Invalid option: -$OPTARG" 1>&2
      usage
      ;;
    : )
      echo "Invalid option: -$OPTARG requires an argument" 1>&2
      usage
      ;;
  esac
done

# Function to generate aliases for scripts
generate_script_aliases() {
    if [[ -n $specific_file ]]; then
        local script_file="$script_dir/$specific_file"
        if [[ -f $script_file ]]; then
            local script_name
            script_name=$(basename "${script_file}" "$file_extension")
            if ! type "$script_name" &>/dev/null; then
                alias "$script_name"="$script_file"
            else
                echo "Alias '$script_name' already exists, skipping..."
            fi
        else
            echo "Specified file '$specific_file' does not exist."
        fi
    else
        while IFS= read -r -d '' script_file; do
            local script_name
            script_name=$(basename "${script_file}" "$file_extension")
            if ! type "$script_name" &>/dev/null; then
                alias "$script_name"="$script_file"
            else
                echo "Alias '$script_name' already exists, skipping..."
            fi
        done < <(find "$script_dir" -type f -name "*$file_extension" -print0)
    fi
}

# Function to remove an alias
remove_alias() {
    if alias "$alias_to_remove" &>/dev/null; then
        unalias "$alias_to_remove"
        echo "Alias '$alias_to_remove' removed."
    else
        echo "Alias '$alias_to_remove' does not exist."
    fi
}

# Function to display all aliases
display_all_aliases() {
    alias
}

# Execute the appropriate function based on options
if [[ -n $alias_to_remove ]]; then
    remove_alias
elif [[ $display_aliases == "y" ]]; then
    display_all_aliases
else
    generate_script_aliases
    echo "Don't forget to source your profile to apply the aliases!"
    source ~/.bashrc # or source ~/.bash_profile
fi
