# Php Memory Profiler By abdulazizsapra

A little tool to show a real-time view of running processes in both linux and windows.

## Installation

The script requires no setup sepicific. It just needs a system that runs php with apache server. Just clone the repo in your apache's main directory and run it in browser.

### For windows

Root Apache Direcotry is

    xampp/htdocs

### For Linux

If you are not using any prepacked server then Root Apache Direcotry is

    /var/www/html/

but if you are using xampp it will be same as

    xampp/htdocs/

## Documentation

The script uses different cmds to run in different OS.

## Windows

In windows it uses

    tasklist

here you can read more about [tasklist cmd](https://learn.microsoft.com/en-us/windows-server/administration/windows-commands/tasklist).

## Linux & Mac

As Linux and Mac are both unix based system, the scripts runs without any issues. The script uses the most famous cmd for memory profiling.

    top

here you can read more about [top cmd](https://www.geeksforgeeks.org/top-command-in-linux-with-examples/).

## How these cmds are run in PHP.

To be able to run termial cmds in php a specific function of php was used.

    shell_exec()

shell_exec — Executes command via shell and return the complete output as a string. You can read more about it here: [shell_exec](https://www.php.net/manual/en/function.shell-exec.php)

## Usage

Just open the script on browser and it will display you the current running processes in your OS. You can search with PID in the script to find statistics specifically about a process.
