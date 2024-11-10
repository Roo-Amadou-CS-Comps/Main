import time
import subprocess
from memory_profiler import memory_usage
def run_program(type, OUTPUTruntime):
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
    """print("Results from running", commands[type][0], ":")
    print("Output:", stdout.decode())
    print("Error Output:", stderr.decode())
    print(f"Runtime of {commands[type][0]} command: {runtime:.2f} seconds")
    """
    OUTPUTruntime = runtime

# Measure memory usage
def profile_memory_usage(num):
    """Profiles memory usage of the Hydra command."""
    runtime = 0
    mem_usage = memory_usage((run_program, (num, runtime)), max_iterations=10, interval=0.05)
    peak_memory = max(mem_usage)
    """print(f"Peak Memory Usage: {peak_memory:.2f} MB")"""

    return runtime, peak_memory

# Execute the memory profiling and runtime measurement
if __name__ == "__main__":
    totalRuns = 15
    tottimeHYDRA = 0
    tottimeRASP = 0
    totmemHYDRA = 0
    totmemRASP = 0

    for i in range(totalRuns):
        print("Running hydra command...")
        runtimeHYDRA, memHYDRA = profile_memory_usage(0)
        tottimeHYDRA += runtimeHYDRA
        totmemHYDRA += memHYDRA

        print("\n")
        print("Waiting for 10 seconds before running the next command to let server cool down...")
        time.sleep(10)

        print("\n") 
        print("Running raspray command...")
        runtimeRASP, memRASP = profile_memory_usage(1)
        tottimeRASP += runtimeRASP
        totmemRASP += memRASP

        print("\n")
        print("Waiting for 30 seconds before running the next run to let server cool down...")
        time.sleep(30)

    avgHYDRA = tottimeHYDRA / totalRuns
    avgRASP = tottimeRASP / totalRuns
    avgmemHYDRA = totmemHYDRA / totalRuns
    avgmemRASP = totmemRASP / totalRuns

    print("\n")
    print("Average runtime for Hydra command:", avgHYDRA)
    print("Average runtime for Raspray command:", avgRASP)
    print("Average memory usage for Hydra command:", avgmemHYDRA)
    print("Average memory usage for Raspray command:", avgmemRASP)

    
        