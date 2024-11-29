export interface IProduct {
  id: number;
  name: string;
  slug: string;
  qty: number;
  price: number;
  desc: string;
  thumbnail: string;
  first_image?: string;
  second_image?: string;
  third_image?: string;
  status: boolean;
  colors: IColor[];
  sizes: ISize[];
}

export interface IColor {
  id: number;
  name: string;
}

export interface ISize {
  id: number;
  name: string;
}

export interface ICoupon {
  name: string;
  discount: number;
}

export interface IProductItem {
  product_id: string;
  ref: string;
  name: string;
  slug: string;
  qty: number;
  price: number;
  color: string; // name
  size: string; // name
  maxQty: number;
  image: string;
  coupon_id: string;
}
