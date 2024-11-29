import { useAppSelector } from "../../redux/store/hooks";
import CartItem from "./CartItem";
import CartRight from "./CartRight";

const Cart = (): JSX.Element => {
  const { cartItems } = useAppSelector((state) => state.cart);
  return (
    <div className="font-sans md:max-w-4xl max-md:max-w-xl mx-auto bg-white py-4">
      <div className="grid md:grid-cols-3 gap-4">
        <div className="md:col-span-2 bg-gray-100 p-4 rounded-md">
          <h2 className="text-2xl font-bold text-gray-800">Cart</h2>
          {cartItems.map((ci) => (
            <CartItem key={ci.ref} cartItem={ci} />
          ))}
        </div>
        <CartRight cartItems={cartItems} />
      </div>
    </div>
  );
};

export default Cart;
