let URL = '';

switch (process.env.NODE_ENV) {
case 'development':
    URL = 'http://127.0.0.1:8000';
    break;
default:
    break;
}

const API_URL = URL;

export default API_URL;
