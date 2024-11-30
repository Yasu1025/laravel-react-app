import { useAppSelector } from "../../redux/store/hooks";
import CheckoutItem from "./CheckoutItem";

const Checkout = (): JSX.Element => {
  const { cartItems } = useAppSelector((state) => state.cart);
  const getTotalPriceWithDiscount = (): number => {
    return cartItems.reduce((sum, ci) => (sum += ci.price * ci.qty), 0);
  };

  return (
    <div className="grid md:grid-cols-2 gap-4">
      <div className="grid-item">User info</div>
      <div className="grid-item col-span-1">
        <div>
          {cartItems.map((ci) => (
            <CheckoutItem cartItem={ci} />
          ))}
        </div>
        <div className="flex flex-col p-1 text-right">
          <span className="font-bold">
            Discount 10% - Summer coupon
            <span className="font-bold text-red-600 ml-4">-$32</span>
          </span>
          <span>
            Total:{" "}
            <span className="font-bold text-red-600 text-xl">
              ${getTotalPriceWithDiscount()}
            </span>
          </span>
        </div>
      </div>
    </div>
  );
};

export default Checkout;
