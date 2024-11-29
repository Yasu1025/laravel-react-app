import { useEffect, useState } from "react";
import { IColor, IProduct, ISize } from "../../types";
import { useParams } from "react-router-dom";
import apiClient from "../../api/client";
import Spinner from "../layouts/Spinner";
import AlertMessage from "../layouts/Alert";
import Slider from "./images/Slider";
import { addToCart } from "../../redux/store/slices/cartSlices";
import { useAppDispatch } from "../../redux/store/hooks";
import { makeUniqueId } from "../../utils";

const Product = (): JSX.Element => {
  const dispatch = useAppDispatch();
  const [product, setProduct] = useState<IProduct | null>(null);
  const [selectedColor, setSelectedColor] = useState<IColor | null>(null);
  const [selectedSize, setSelectedSize] = useState<ISize | null>(null);
  const [qty, setQty] = useState(1);
  const [loading, setLoading] = useState(false);
  const { slug } = useParams();

  useEffect(() => {
    const fetchProductBySlug = async () => {
      setLoading(true);
      try {
        const { data } = await apiClient.get(`/products/${slug}/show`);
        setProduct(data.data as IProduct);
      } catch (error) {
        setProduct(null);
        console.log(error);
      }
      setLoading(false);
    };
    fetchProductBySlug();
  }, [slug]);

  return (
    <div>
      {loading ? (
        <Spinner />
      ) : !product ? (
        <AlertMessage textColor="red" content="No product to show...." />
      ) : (
        <section className="text-gray-600 body-font overflow-hidden">
          <div className="container px-5 py-24 mx-auto">
            <div className="lg:w-4/5 mx-auto flex flex-wrap">
              <div className=" w-1/2">
                <Slider product={product} />
              </div>
              <div className="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h1 className="text-gray-900 text-3xl title-font font-medium mb-1">
                  {product.name}
                </h1>
                <p className="leading-relaxed">{product.desc}</p>
                <div className="flex mt-6 items-center pb-5 mb-1">
                  <div className="flex">
                    <span className="mr-3">Color</span>
                    {product.colors.map((color) => (
                      <button
                        key={`color-${color.id}`}
                        onClick={() => setSelectedColor(color)}
                        className={`${
                          selectedColor?.id === color.id
                            ? "border-2 w-7 h-7 border-black "
                            : "border-gray-300 "
                        } rounded-full w-6 h-6 ml-1 focus:outline-none`}
                        style={{ backgroundColor: color.name }}
                      ></button>
                    ))}
                  </div>
                  <div className="flex ml-6 items-center">
                    <span className="mr-3">Size</span>
                    <div className="relative">
                      {product.sizes.map((size) => (
                        <button
                          key={`size-${size.id}`}
                          onClick={() => setSelectedSize(size)}
                          className={`${
                            selectedSize?.id === size.id
                              ? "bg-gray-600 text-white"
                              : "bg-gray-300"
                          }  w-6 h-6 ml-1 focus:outline-none`}
                        >
                          {size.name}
                        </button>
                      ))}
                    </div>
                  </div>
                </div>
                <div className="flex items-center mb-5">
                  <span className="mr-3">Qty</span>
                  <div className="relative">
                    <select
                      className="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10"
                      name="qty"
                      value={qty}
                      onChange={(e) => setQty(Number(e.target.value))}
                    >
                      {Array.from({ length: 10 }).map((_, i) => (
                        <option key={`qty-${i + 1}`} value={i + 1}>
                          {i + 1}
                        </option>
                      ))}
                    </select>
                  </div>
                </div>
                <div className="flex">
                  <span className="title-font font-medium text-2xl text-gray-900">
                    ${product.price}
                  </span>
                  <button
                    onClick={() => {
                      dispatch(
                        addToCart({
                          product_id: product.id,
                          ref: makeUniqueId(10),
                          name: product.name,
                          slug: product.slug,
                          qty: qty,
                          price: product.price,
                          color: selectedColor?.name,
                          size: selectedSize?.name,
                          maxQty: product.qty,
                          image: product.thumbnail,
                          coupon_id: null,
                        })
                      );
                      setSelectedColor(null);
                      setSelectedSize(null);
                      setQty(1);
                    }}
                    disabled={!selectedColor || !selectedSize || !qty}
                    className="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 disabled:bg-gray-400 rounded"
                  >
                    Add Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>
      )}
    </div>
  );
};

export default Product;
