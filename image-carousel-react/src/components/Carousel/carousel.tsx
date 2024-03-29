import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination } from "swiper/modules";
import React, { useState } from "react";
import "./carousel.css";
import useFetchDiscounts from "../../hooks/useFetchDiscounts";

const Carousel: React.FC = () => {
  const [name, setName] = useState<string>("");
  const [discountPercentage, setDiscountPercentage] = useState<string>("");
  const { data, loading, error } = useFetchDiscounts(name, discountPercentage);

  if (loading) {
    return <div className="loading">Loading...</div>;
  }

  if (error) {
    return (
      <div className="error">
        Sorry, an error occurred while fetching the discounts. Please try again
        later.
      </div>
    );
  }

  return (
    <>
      <div className="filter-container">
        <input
          type="text"
          placeholder="Name"
          value={name}
          onChange={(e) => setName(e.target.value)}
        />
        <input
          type="number"
          placeholder="Discount Percentage"
          value={discountPercentage}
          onChange={(e) => setDiscountPercentage(e.target.value)}
        />
      </div>

      <div className="carousel-container">
        {data.length > 0 ? (
          <Swiper
            modules={[Navigation, Pagination]}
            spaceBetween={30}
            slidesPerView={1}
            navigation={true}
            pagination={{
              clickable: true,
            }}
            loop={true}
            breakpoints={{
              320: {
                slidesPerView: 1,
                spaceBetween: 10,
              },
              640: {
                slidesPerView: 1,
                spaceBetween: 20,
              },
              768: {
                slidesPerView: 1,
                spaceBetween: 30,
              },
            }}
          >
            {data.map((discount) => (
              <SwiperSlide key={discount.id}>
                <div className="slide-content">
                  <img src={discount.image} alt={discount.name} />
                  <div className="slide-title">{discount.name}</div>
                  <div className="slide-discount">
                    {discount.discount_percentage}%
                  </div>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        ) : (
          <div className="no-results">
            Sorry, there are no venues matching your search and filters.
          </div>
        )}
      </div>
    </>
  );
};

export default Carousel;
