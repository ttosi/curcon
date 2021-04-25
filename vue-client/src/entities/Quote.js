import store from "@/store/";
import network from "@/services/network";

export default {
  async add(quote) {
    return network
      .post("/api/quote", quote);
  },
  async delete(id) {
  }
};

/*
conversion_id: 2
country: "IT"
created: "2021-04-22 11:30:33"
currency: "EUR"
id: 3
quote_date: "2021-04-22 21:09:21"
rate: 0.830357
*/