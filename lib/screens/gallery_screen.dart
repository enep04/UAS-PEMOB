import 'package:flutter/material.dart';
import 'package:flutter_gallery/models/painting.dart';
import 'package:flutter_gallery/widgets/painting_grid_item.dart';
import 'painting_detail_screen.dart';

class GalleryScreen extends StatelessWidget {
  final List<Painting> paintings = [
    Painting(
      id: '1',
      title: 'Starry Night',
      artist: 'Vincent van Gogh',
      imageUrl: 'https://example.com/starry_night.jpg',
      description: 'A famous painting by Vincent van Gogh.',
    ),
    Painting(
      id: '2',
      title: 'Mona Lisa',
      artist: 'Leonardo da Vinci',
      imageUrl: 'https://example.com/mona_lisa.jpg',
      description: 'The most famous portrait in the world.',
    ),
    // Add more paintings here
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Digital Painting Gallery'),
      ),
      body: GridView.builder(
        padding: const EdgeInsets.all(10),
        gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
          crossAxisCount: 2,
          crossAxisSpacing: 10,
          mainAxisSpacing: 10,
          childAspectRatio: 3 / 4,
        ),
        itemCount: paintings.length,
        itemBuilder: (ctx, i) => PaintingGridItem(
          painting: paintings[i],
          onSelectPainting: (Painting painting) {
            Navigator.of(context).push(
              MaterialPageRoute(
                builder: (ctx) => PaintingDetailScreen(painting: painting),
              ),
            );
          },
        ),
      ),
    );
  }
}
