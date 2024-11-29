import React from "react";
import { IProductItem } from "../../types";
import { useAppDispatch } from "../../redux/store/hooks";
import {
  decrementQty,
  incrementQty,
  removeFromCart,
} from "../../redux/store/slices/cartSlices";

interface Props {
  cartItem: IProductItem;
}

const CartItem = ({ cartItem }: Props): JSX.Element => {
  const dispatch = useAppDispatch();

  return (
    <div className="space-y-4">
      <div className="grid grid-cols-3 items-center gap-4">
        <div className="col-span-2 flex items-center gap-4">
          <button
            onClick={() => dispatch(removeFromCart(cartItem))}
            className="flex text-white bg-red-400 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="12"
              height="12"
              fill="currentColor"
              className="bi bi-trash3"
              viewBox="0 0 16 16"
            >
              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
            </svg>
          </button>
          <div className="w-24 h-24 shrink-0 p-2">
            <img
              src={cartItem.image}
              className="w-full h-full object-contain"
            />
          </div>

          <div>
            <h3 className="text-base font-bold text-gray-800">
              {cartItem.name}
            </h3>

            <div className="flex gap-4 mt-4">
              <div
                className={`rounded-full w-6 h-6 ml-1 focus:outline-none`}
                style={{ backgroundColor: cartItem.color }}
              ></div>
              <p>XL</p>
              <div className="flex items-center">
                <button
                  onClick={() => dispatch(incrementQty(cartItem))}
                  disabled={cartItem.qty >= cartItem.maxQty}
                  className="cursor-pointer flex items-center justify-center text-sm rounded-full disabled:bg-gray-400 bg-black text-white w-4 h-4 mr-1"
                >
                  ↑
                </button>
                <span>QTY: {cartItem.qty}</span>
                <button
                  onClick={() => dispatch(decrementQty(cartItem))}
                  disabled={cartItem.qty === 1}
                  className="cursor-pointer flex items-center justify-center text-sm rounded-full disabled:bg-gray-400 bg-black text-white w-4 h-4 ml-1"
                >
                  ↓
                </button>
              </div>
            </div>
          </div>
        </div>
        <div className="ml-auto">
          <h4 className="text-base font-bold text-gray-800">
            ${cartItem.price * cartItem.qty}
          </h4>
        </div>
      </div>
    </div>
  );
};

export default CartItem;
