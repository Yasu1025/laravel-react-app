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
  created_at: string;
  updated_at: string;
}

export interface IColor {
  id: number;
  name: string;
  created_at: string;
  updated_at: string;
}

export interface ISize {
  id: number;
  name: string;
  created_at: string;
  updated_at: string;
}
