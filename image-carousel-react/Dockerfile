# Set the base image for a Node environment
FROM node:20

# Set working directory
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . .

# Install dependencies
RUN npm ci

# Build your app
RUN npm run build

RUN ls -l build

# Install serve to serve your app on port 3000
RUN npm install -g serve

# Expose port 3000
EXPOSE 3000

# Command to run your app using serve
CMD ["serve", "-s", "build", "-l", "3000"]
