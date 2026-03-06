import type { Metadata } from "next";
import "./globals.css";

export const metadata: Metadata = {
  title: "The Taste Of Music",
  description: "A personal wall of artists and songs."
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <body>{children}</body>
    </html>
  );
}
