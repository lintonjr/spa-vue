import Vue from 'vue'
export default {
  state: {
    users: {},
  },
  mutations: {
    SET_USERS(state, users) {
      state.users = users
      // console.log(state.users);
    }
  },
  actions: {
    loadUsers({
      commit
    }) {
      Vue.prototype.$http("http://api-vue-padrao.local/api/v1/users/").then(response => {
        // console.log(response.data);
        commit('SET_USERS', response.data);
      });
    },
  },
  getters: {
    users(state) {
      // console.log(state.users);
      return state.users;
    }
  }
}
