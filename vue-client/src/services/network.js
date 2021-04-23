import store from "@/store";

const network = {
  apiUrl: "http://localhost:8000",
  get(endpoint) {
    return fetch(`${this.apiUrl}${endpoint}`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        Authorization: store.state.token,
      }
    })
    .then((res) => res.json())
    .then((data) => {
      return data;
    });
  },
  post(endpoint, body) {
    return fetch(`${this.apiUrl}${endpoint}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Authorization: store.state.token
      },
      body: JSON.stringify(body),
    })
    .then((res) => res.json())
    .then((data) => {
      return data;
    });
  }
};

export default network;
