import network from "@/services/network";

export default {
  async add(quote) {
    return network
      .post("/api/quote", quote);
  },
  async delete(id) {
  }
};