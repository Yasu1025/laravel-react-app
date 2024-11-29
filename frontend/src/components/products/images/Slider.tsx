import { useEffect, useState } from "react";
import ImageGallery from "react-image-gallery";
import { IProduct } from "../../../types/index";

interface Props {
  product: IProduct;
}

const Slider = ({ product }: Props): JSX.Element => {
  const [images, setImages] = useState<
    { original: string; thumbnail: string }[]
  >([]);
  const [loaded, setLoaded] = useState(false);
  const imagesKey = ["first_image", "second_image", "third_image"] as const;

  const handleImages = () => {
    let updatedImages = [
      {
        original: product.thumbnail,
        thumbnail: product.thumbnail,
      },
    ];
    imagesKey.forEach((key) => {
      if (product[key]) {
        updatedImages = [
          ...updatedImages,
          {
            original: product[key],
            thumbnail: product[key],
          },
        ];
      }
    });

    setImages(updatedImages);
    setLoaded(true);
  };

  useEffect(() => {
    handleImages();
  }, []);

  return (
    <ImageGallery
      showPlayButton={loaded}
      showFullscreenButton={loaded}
      items={images}
    />
  );
};

export default Slider;
