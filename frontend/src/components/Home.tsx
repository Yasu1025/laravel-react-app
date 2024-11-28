import { useEffect, useState } from "react";
import { IColor, IProduct, ISize } from "../types";
import apiClient from "../api/client";
import ProductList from "./products/ProductList";

const Home = (): JSX.Element => {
  const [products, setProducts] = useState<IProduct[]>([]);
  const [colors, setColors] = useState<IColor[]>([]);
  const [sizes, setSizes] = useState<ISize[]>([]);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    const fetchAllProducts = async () => {
      try {
        const { data } = await apiClient.get("/products");
        setProducts(data.data as IProduct[]);
        setColors(data.colors as IColor[]);
        setSizes(data.colors as ISize[]);
      } catch (error) {
        console.log(error);
      }
    };
    fetchAllProducts();
  }, []);

  return <ProductList products={products} />;
};

export default Home;
