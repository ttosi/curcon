import store from "@/store/";
import network from "@/services/network";

export default {
  async list() {
    return network.get(
      `/api/conversion/user/${store.state.userId}`
    )
  },
  async delete(id) {

  }
};
