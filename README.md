# Hello World en PHP con MQTT - Docker Image

This Docker image contains a simple PHP service that publishes a "Hello World from PHP and MQTT" message to an MQTT broker.

## Contents of the Image

The image contains the following files and configurations:

- **mqtt_hello_world.php:**:  The main PHP script that connects to an MQTT broker and publishes a message.
- **Dockerfile**: The configuration file that defines the Docker image, the PHP environment, and the steps required to run the application when the container starts
- **composer.json: **: The Composer configuration file to manage PHP dependencies, like phpMQTT.
- **phpMQTT: **:  The phpMQTT library is used to facilitate communication with the MQTT broker.

## How to Use This Image

To run the program on your machine, make sure Docker is installed. Then, follow these steps:

- **Run the Docker Container:**:  you can run the container with the following command:

```bash
docker run -p 8080:8080 kamartinez/mqtt-php-app:v1


**Access the MQTT Service**:  Once the container is running, the message "Hello World from PHP and MQTT" will be automatically published to the specified MQTT broker. To verify, you can use an MQTT client or check Docker logs to see if the message was successfully published.

Using an MQTT Client to Verify:With an MQTT client, you can subscribe to the topic specified in the PHP code (e.g., test/topic) and see the published message. If you use mosquitto_sub (from the Mosquitto MQTT tools), the command would be:

```bash
mosquitto_sub -h mqtt.eclipse.org -t 'test/topic'

