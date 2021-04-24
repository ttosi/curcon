import store from "@/store/";
import network from "@/services/network";

export default {
  async list() {
    return network
      .get(`/api/conversion/user/${store.state.userId}`);
  },
  create(conversion) {
    conversion.userId = store.state.userId;
    return network
      .post("/api/conversion", conversion);
  },
  async delete(id) {},
};
