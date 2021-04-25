import network from "@/services/network";

export default {
  async list() {
    return network.get(
      `/api/currency`
    )
  }
};
