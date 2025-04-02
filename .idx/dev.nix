{pkgs}: {
  channel = "stable-24.05";
  packages = [
    pkgs.nodejs_20
    pkgs.php82Packages.composer
     pkgs.php82               # PHP 8.2 pour Laravel 12
    pkgs.nodejs              # Si nécessaire pour les assets (Vite, etc.)
    pkgs.mariadb             # Ou pkgs.mysql si vous utilisez MySQL
    pkgs.mysql80
  ];

  services.mysql = {
    enable = true;
    package = pkgs.mysql80;
  };
  idx.extensions = [
    "svelte.svelte-vscode"
    "vue.volar"
  ];
  idx.previews = {
    previews = {
      web = {
        command = [
          "npm"
          "run"
          "dev"
          "--"
          "--port"
          "$PORT"
          "--host"
          "0.0.0.0"
        ];
        manager = "web";
      };
    };
  };
}