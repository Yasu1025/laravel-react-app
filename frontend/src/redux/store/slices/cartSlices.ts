import { createSlice } from "@reduxjs/toolkit";
import { ICoupon, IProductItem } from "../../../types";
import { toast } from "react-toastify";

interface State {
  cartItems: IProductItem[];
  validCoupon: ICoupon;
}

const initialState: State = {
  cartItems: [],
  validCoupon: {
    name: "",
    discount: 0,
  },
};

export const cartSlice = createSlice({
  name: "Cart",
  initialState,
  reducers: {
    addToCart(state, { payload }) {
      const item: IProductItem = payload;
      const productItem = state.cartItems.find(
        (product) =>
          product.product_id === item.product_id &&
          product.color === item.color &&
          product.size === item.size
      );

      if (productItem) {
        toast.info("Already added!!!");
      } else {
        state.cartItems = [item, ...state.cartItems];
        toast.success("Aded!!!");
      }
    },
    removeFromCart(state, { payload }) {
      const item: IProductItem = payload;
      state.cartItems = state.cartItems.filter((ci) => ci.ref !== item.ref);
      toast.error("Deleted!!!");
    },
    incrementQty(state, { payload }) {
      const item: IProductItem = payload;
      const targetItem = state.cartItems.find((ci) => ci.ref === item.ref);
      if (targetItem) {
        if (targetItem.qty <= item.maxQty) targetItem.qty += 1;
        if (targetItem.qty === item.maxQty) {
          toast.info(`Only ${item.maxQty} available`);
        }
      }
    },
    decrementQty(state, { payload }) {
      const item: IProductItem = payload;
      const targetItem = state.cartItems.find((ci) => ci.ref === item.ref);
      if (targetItem && targetItem.qty > 1) targetItem.qty -= 1;
    },
  },
});

const cartReducer = cartSlice.reducer;

export const { addToCart, removeFromCart, incrementQty, decrementQty } =
  cartSlice.actions;
export default cartReducer;
