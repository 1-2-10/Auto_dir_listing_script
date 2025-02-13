#!/bin/bash

# List of services to check
services=("apache2" "mysql" "ssh" "x2goserver" "apparmor" "ufw")

# Check the status of each service
for service in "${services[@]}"; do
    echo "Checking status of $service..."
    
    # Check service status
    systemctl is-active --quiet $service

    # Check exit code of the last command (systemctl)
    if [ $? -eq 0 ]; then
        echo "$service is running. Yeaaah :)"
    else
        echo "$service is | NOT! | running. Bummer! :("
    fi
    
    # Output a line break for separation
    echo "################"
done
