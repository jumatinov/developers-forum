/* eslint-disable */
import axios from 'axios';
import API_URL from './env';

const DEFAULT_HEADERS = {

};

const validStatuses = [
    200, 201, 202, 203, 204,
    300, 301, 302, 303, 304,
];

/*
 * Returns default headers list
 * which will be used with every request.
 */
function getHeaders(multipart = false) {
    let defaultHeaders = DEFAULT_HEADERS;

    if (multipart) {
        defaultHeaders = {};
    }

    if (localStorage.getItem('api_token')) {
        defaultHeaders = {
            Authorization: `Bearer ${localStorage.getItem('api_token')}`,
            ...defaultHeaders,
        };
    }
    return defaultHeaders;
}

export function checkResponse(response) {
    if (validStatuses.includes(response.status)) {
        return response;
    }

    // If not authorized then reset token
    // and redirect to login page
    if (response.status === 401) {
        localStorage.removeItem('token');
        return Promise.reject(new Error('USER_ANONYMOUS'));
    }

    const err = new Error(response.statusText);
    err.response = response;

    return Promise.reject(err);
}

export function processAPIErrors(apiErrors) {
    const errors = {};

    if (apiErrors) {
        for (const key of Object.keys(apiErrors)) {
            const err = apiErrors[key];

            errors[key] = err;

            if (typeof err === Object || err.hasOwnProperty('length')) {
                errors[key] = apiErrors[key][0];
            }
        }
    }

    return errors;
}

export const esc = encodeURIComponent;

export function qs(params) {
    return (
        Object
            .keys(params)
            .map((k) => `${esc(k)}=${esc(params[k])}`)
            .join('&')
    );
}

/*
 * Wraps axios and provides
 * more convenient post method
 * calls with data
 */
export function post(uri, data) {
    uri = getFullUri(uri);
    return axios.post(uri, data, {
        headers: getHeaders(),
    });
}

/*
 * Wraps axios and provides
 * more convenient put method
 * calls with data
 */
export function put(uri, data) {
    uri = getFullUri(uri);
    return axios.put(uri, data, {
        headers: getHeaders(),
    });
}

/*
 * Wraps axios and provides
 * more convenient delete method
 */
export function remove(uri) {
    uri = getFullUri(uri);
    return axios.delete(uri, {
        headers: getHeaders(),
    });
}

/*
 * Wraps axios and provides
 * more convenient get method
 * calls with data.
 */
export function get(uri, data = {}) {
    uri = getFullUri(uri);
    if (Object.keys(data).length > 0) {
        uri = `${uri}?${qs(data)}`;
    }
    return axios.get(uri, {
        headers: getHeaders(),
    });
}

export function getOtherResource(uri) {
    return axios.get(uri);
}

export function upload(uri, data) {
    uri = getFullUri(uri);
    return fetch(uri, {
        headers: getHeaders(true),
        cors: true,
        method: 'POST',
        body: data,
    });
}

function getFullUri(uri) {
    return API_URL + uri;
}
