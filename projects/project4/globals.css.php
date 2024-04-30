<style type="text/tailwindcss">
   @tailwind base;
   @tailwind components;
   @tailwind utilities;

   :root {
      font-family: Inter, sans-serif;
      font-feature-settings: 'liga' 1, 'calt' 1; /* fix for Chrome */
   }

   @supports (font-variation-settings: normal) {
      :root { font-family: InterVariable, sans-serif; }
   }
</style>