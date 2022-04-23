export default ({ app, store }, inject) => {
  inject("notifier", {
    showMessage({ content = "", color = "" }) {
      store.commit("alerts/showMessage", { content, color });
    }
  });
};
