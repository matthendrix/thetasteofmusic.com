import ArtistWall from "@/components/artist-wall";
import { artists } from "@/data/artists";

export default function HomePage() {
  return <ArtistWall items={artists} />;
}
