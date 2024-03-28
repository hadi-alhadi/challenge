# Image Carousel React

This is a React application that implements an image carousel. The project is written in TypeScript and JavaScript, and uses npm for package management.

## Features

- Fetches discounts from a specified API.
- Displays discounts in an image carousel.

## Prerequisites

- Node.js (>=20)
- npm (>=10)

## Installation
1. Clone the repository:
```bash
git clone https://github.com/hadi-alhadi/image-carousel-react.git
```
2. Navigate to the project directory:
```bash
cd image-carousel-react
```
3. Install the dependencies:
```bash
npm ci
```

## Usage
1. Start the development server:
```bash
npm start
```

2. Open your browser and visit `http://localhost:3000`.


## Testing
Run the tests with the following command:
```bash
npm test
```


## Building
To build the application for production, run:
```bash
npm run build
```

## Docker
A Dockerfile is provided. To build and run the Docker image, use the following commands:

1. Build the Docker image:
```bash
docker build -t image-carousel-react .
```
2. Run the Docker container:
```bash
docker run -p 3000:3000 image-carousel-react
```


## Environment Variables
The application uses the following environment variables:

- `REACT_APP_API_URL`: The base URL of the API.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License - see the [LICENSE.md](https://choosealicense.com/licenses/mit/) file for details
