import Vue from "vue";
import currencySymbols from "./data/currency-symbols.json";

Vue.directive("currency-symbol", {
  inserted(el, binding) {
    const symbol = currencySymbols.find(s => s.code === binding.value);
    el.innerHTML = `${symbol ? symbol.symbol : ""}`;
  },
});
