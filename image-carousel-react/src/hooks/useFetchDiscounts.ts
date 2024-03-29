import { useState, useEffect } from "react";

export interface Discount {
  id: number;
  name: string;
  image: string;
  discount_percentage: number;
}

const useFetchDiscounts = (name: string, discountPercentage: string) => {
  const [data, setData] = useState<Discount[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchData = async () => {
      setLoading(true);
      try {
        const response = await fetch(
          `${process.env.REACT_APP_API_URL}/discounts?name=${name}&discount_percentage=${discountPercentage}`,
        );
        const data = await response.json();
        setData(data);
      } catch (error) {
        setError(error instanceof Error ? error.message : String(error));
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, [name, discountPercentage]);

  return { data, loading, error };
};

export default useFetchDiscounts;
