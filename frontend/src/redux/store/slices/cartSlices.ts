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
    addToCart(state, action) {
      const item: IProductItem = action.payload;
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
  },
});

const cartReducer = cartSlice.reducer;

export const { addToCart } = cartSlice.actions;
export default cartReducer;
