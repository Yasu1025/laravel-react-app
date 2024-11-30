import React from "react";
import { IProductItem } from "../../types";

interface Props {
  cartItem: IProductItem;
}

const CheckoutItem = ({ cartItem }: Props): JSX.Element => {
  return (
    <div className="space-y-4 border-b-2">
      <div className="grid grid-cols-3 items-center gap-4">
        <div className="col-span-2 flex items-center gap-4">
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
            </div>
          </div>
        </div>
        <div className="ml-auto">
          <p className="text-sm text-gray-400">{`$${cartItem.price} x ${cartItem.qty}`}</p>
          <h4 className="text-base font-bold text-red-600">
            ${cartItem.price * cartItem.qty}
          </h4>
        </div>
      </div>
    </div>
  );
};

export default CheckoutItem;
