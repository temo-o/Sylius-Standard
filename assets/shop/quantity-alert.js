document.addEventListener('DOMContentLoaded', () => {
  const quantityInput = document.getElementById('sylius_shop_add_to_cart_cartItem_quantity');

  quantityInput.addEventListener('blur', (event) => {
    const value = parseInt(event.target.value);

    if (value === 70) {
      alert('Great choice!');
    }
  });
});
