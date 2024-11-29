// TODO: Refactoring....(split some parts into smaller components...)
import { useEffect, useState } from "react";
import { IColor, IProduct, ISize } from "../types";
import apiClient from "../api/client";
import ProductList from "./products/ProductList";
import Alert from "./layouts/Alert";
import Spinner from "./layouts/Spinner";

const Home = (): JSX.Element => {
  const [products, setProducts] = useState<IProduct[]>([]);
  const [colors, setColors] = useState<IColor[]>([]);
  const [sizes, setSizes] = useState<ISize[]>([]);
  const [selectedColor, setSelectedColor] = useState("");
  const [selectedSize, setSelectedSize] = useState("");
  const [searchTerm, setSearchTerm] = useState("");
  const [loading, setLoading] = useState(false);

  const handleColorSelectBox = (e: React.ChangeEvent<HTMLSelectElement>) => {
    setSelectedSize("");
    setSearchTerm("");
    setSelectedColor(e.target.value);
  };
  const handleSizeSelectBox = (e: React.ChangeEvent<HTMLSelectElement>) => {
    setSearchTerm("");
    setSelectedColor("");
    setSelectedSize(e.target.value);
  };
  const clearFilters = () => {
    setSelectedSize("");
    setSearchTerm("");
    setSelectedColor("");
  };

  useEffect(() => {
    const fetchProducts = async () => {
      setLoading(true);
      try {
        const apiPath = selectedColor
          ? `/products/${selectedColor}/color`
          : selectedSize
          ? `/products/${selectedSize}/size`
          : searchTerm
          ? `/products/${searchTerm}/find`
          : "/products";
        const { data } = await apiClient.get(apiPath);

        setProducts(data.data as IProduct[]);
        setColors(data.colors as IColor[]);
        setSizes(data.sizes as ISize[]);
      } catch (error) {
        console.log(error);
      }
      setLoading(false);
    };

    fetchProducts();
  }, [selectedColor, selectedSize, searchTerm]);

  return (
    <div>
      <div className="mb-5 flex justify-end">
        <div>
          <p>Filter by Color</p>
          <select
            className="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            name="color_id"
            id="color_id"
            defaultValue={""}
            onChange={(e) => handleColorSelectBox(e)}
            disabled={Boolean(selectedSize || searchTerm)}
          >
            <option
              value=""
              disabled={!selectedColor}
              onChange={() => clearFilters()}
            >
              All Colors
            </option>
            {colors.map((color) => (
              <option key={color.id} value={color.id}>
                {color.name}
              </option>
            ))}
          </select>
        </div>
        <div className="ml-5">
          <p>Filter by Size</p>
          <select
            className="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            name="size_id"
            id="size_id"
            defaultValue={""}
            onChange={(e) => handleSizeSelectBox(e)}
            disabled={Boolean(selectedColor || searchTerm)}
          >
            <option
              value=""
              disabled={!selectedSize}
              onChange={() => clearFilters()}
            >
              All Sizes
            </option>
            {sizes.map((size) => (
              <option key={size.id} value={size.id}>
                {size.name}
              </option>
            ))}
          </select>
        </div>
        <div className="ml-5 flex flex-col">
          <label htmlFor="searchTerm">Filter by Term</label>
          <input
            className="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            id="searchTerm"
            type="text"
            placeholder="Search"
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            disabled={Boolean(selectedColor || selectedSize)}
          />
        </div>
      </div>
      {loading ? (
        <Spinner />
      ) : products.length > 0 ? (
        <ProductList products={products} />
      ) : (
        <Alert content="No Products...." />
      )}
    </div>
  );
};

export default Home;
